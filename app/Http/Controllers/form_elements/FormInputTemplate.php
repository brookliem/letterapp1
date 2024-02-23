<?php

namespace App\Http\Controllers\form_elements;

use App\Models\Items;
use App\Models\Templates;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\AddAttachment;

class FormInputTemplate extends Controller
{
    public function index()
    {
        $newCode = $this->generateCode();
        return view('content.form-elements.forms-input-template', ['newCode' => $newCode]);
    }

    public function print()
    {
        $templates = Templates::latest()->get()->first();
        $items = $templates ? $templates->items()->orderBy('created_at')->get() : [];
        $attachments = $templates ? $templates->attachments()->orderBy('created_at')->get() : [];
        $addattachments = $templates ? $templates->addattachments()->orderBy('created_at')->get() : [];
        return view('content.form-elements.forms-print', compact('templates', 'items', 'attachments', 'addattachments'));
    }

    public function print2()
    {
        $templates = Templates::latest()->get()->first();
        $items = $templates ? $templates->items()->orderBy('created_at')->get() : [];
        $attachments = $templates ? $templates->attachments()->orderBy('created_at')->get() : [];
        $addattachments = $templates ? $templates->addattachments()->orderBy('created_at')->get() : [];
        return view('content.form-elements.forms-print2', compact('templates', 'items', 'attachments', 'addattachments'));
    }

    public function printdata($id)
    {
        $templates = Templates::find($id);
        $items = $templates ? $templates->items()->orderBy('created_at')->get() : [];
        $attachments = $templates ? $templates->attachments()->orderBy('created_at')->get() : [];
        $addattachments = $templates ? $templates->addattachments()->orderBy('created_at')->get() : [];
        return view('content.form-elements.forms-print', compact('templates', 'items', 'attachments', 'addattachments'));
    }

    public function printdata2($id)
    {
        $templates = Templates::find($id);
        $items = $templates ? $templates->items()->orderBy('created_at')->get() : [];
        $attachments = $templates ? $templates->attachments()->orderBy('created_at')->get() : [];
        $addattachments = $templates ? $templates->addattachments()->orderBy('created_at')->get() : [];
        return view('content.form-elements.forms-print2', compact('templates', 'items', 'attachments', 'addattachments'));
    }


    public function create()
    {
        return view('content.form-elements.forms-input-template');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'lampiran' => 'required|string',
            'perihal' => 'required|string',
            'kepada' => 'required|string',
            'deskripsi' => 'required|string',
            'dibuatoleh' => 'required|string',
            'diperiksaoleh' => 'required|string',
            'diketahuioleh' => 'required|string',
            'disetujuioleh' => 'nullable|string',
            'posisi1' => 'required|string',
            'posisi2' => 'required|string',
            'posisi3' => 'required|string',
            'namabarang' => 'required|array',
            'jumlah' => 'required|array',
            'satuan' => 'required|array',
            'keterangan' => 'required|array',
            'harga' => 'required|array',
            'attachments.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'attachments_detail' => 'nullable|array',
            'addattachments.*' => 'nullable|mimes:jpeg,png,jpg,gif,pdf|max:2048',
            'tandatangan1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tandatangan2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tandatangan3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tandatangan4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $templates = Templates::create([
            'date' => $request->date,
            'imnumber' => $this->generateCode(),
            'lampiran' => $request->lampiran,
            'perihal' => $request->perihal,
            'kepada' => $request->kepada,
            'deskripsi' => $request->deskripsi,
            'dibuatoleh' => $request->dibuatoleh,
            'diperiksaoleh' => $request->diperiksaoleh,
            'diketahuioleh' => $request->diketahuioleh,
            'disetujuioleh' => $request->disetujuioleh,
            'posisi1' => $request->posisi1,
            'posisi2' => $request->posisi2,
            'posisi3' => $request->posisi3,
        ]);

        // Save signatures
        $data = [];

        for ($i = 1; $i <= 4; $i++) {
            $signatureKey = 'tandatangan' . $i;

            if ($request->file($signatureKey)) {
                $file = $request->file($signatureKey);

                $filename = uniqid() . $file->getClientOriginalName();
                $file->move(public_path('upload/user-tandatangan'), $filename);

                // Save the signature file path in the data array
                $data[$signatureKey] = $filename;
            }
        }

        // Update the template with the signature paths
        $templates->update($data);

        if ($templates) {


            foreach ($request->namabarang as $key => $itemData) {
                $harga = str_replace('.', '', $request->harga[$key]);

                $items = new Items([
                    'namabarang' => $itemData,
                    'jumlah' => $request->jumlah[$key],
                    'satuan' => $request->satuan[$key],
                    'keterangan' => $request->keterangan[$key],
                    'harga' => $harga,
                ]);

                $templates->items()->save($items);
            }

            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $key => $attachment) {
                    // Get original filename and store file in the public directory
                    $filename = uniqid() . $attachment->getClientOriginalName();
                    $attachment->move(public_path('data-attachments'), $filename);

                    // Handle optional attachment details
                    $attachmentsDetail = $request->filled('attachments_detail') ? $request->attachments_detail[$key] : null;

                    // Create Attachment model and save to the database
                    $attachmentModel = new Attachment([
                        'attachments' => $filename, // Save the filename, not the file instance
                        'attachments_detail' => $attachmentsDetail,
                    ]);

                    $templates->attachments()->save($attachmentModel);
                }
            }

            if ($request->hasFile('addattachments')) {
                foreach ($request->file('addattachments') as $key => $addattachment) {
                    // Get original filename and store file in the public directory
                    $filename = uniqid() . $addattachment->getClientOriginalName();
                    $addattachment->move(public_path('data-lampiran'), $filename);

                    // Create AddAttachment model and save to the database
                    $addattachmentModel = new AddAttachment([
                        'addattachments' => $filename, // Save the filename, not the file instance
                    ]);

                    $templates->addattachments()->save($addattachmentModel);
                }
            }
            $hasDisetujuioleh = !empty($templates->disetujuioleh);
            if ($hasDisetujuioleh) {
                return redirect('print2')->with('targetBlank', true);
            } else {
                return redirect('print')->with('targetBlank', true);
            }
        }
    }

    public function generateCode()
    {
        // Function to convert Arabic number to Roman numerals
        function arabicToRoman($number)
        {
            $map = [
                'M' => 1000,
                'CM' => 900,
                'D' => 500,
                'CD' => 400,
                'C' => 100,
                'XC' => 90,
                'L' => 50,
                'XL' => 40,
                'X' => 10,
                'IX' => 9,
                'V' => 5,
                'IV' => 4,
                'I' => 1,
            ];

            $result = '';

            foreach ($map as $roman => $arabic) {
                while ($number >= $arabic) {
                    $result .= $roman;
                    $number -= $arabic;
                }
            }

            return $result;
        }

        // Get the last used number and year from the database
        $lastTemplate = Templates::latest()->first();
        $currentNumber = 1;
        $currentYear = date('Y'); // Set to the actual current year

        if ($lastTemplate) {
            $lastYear = date('Y', strtotime($lastTemplate->created_at));
            $currentNumber = ($currentYear == $lastYear) ? (explode('/', $lastTemplate->imnumber)[0] + 1) : 1;
        }

        // Get the current month after the potential assignment
        $currentMonth = date('n');

        // Convert the numeric month to Roman numerals
        $romanMonth = arabicToRoman($currentMonth);

        // Generate the code
        $code = "{$currentNumber}/CMI-IT-JKT/IM/$romanMonth/{$currentYear}";

        return $code;
    }



    public function edit($id)
    {
        $templates = Templates::find($id);
        $items = $templates->items()->orderBy('created_at')->get();
        $attachments = $templates->attachments()->orderBy('created_at')->get();
        return view('content.form-elements.forms-edit-template', compact('templates', 'items', 'attachments'));
    }

    public function update($id)
    {
    }
}
