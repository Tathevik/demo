<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Chumper\Zipper\Zipper as Zipper;



class XmlGenerateController extends Controller
{
    public function index()
    {

        $xml = new \SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><schema></schema>');

        $xml->addAttribute('version', '2.0');
        $xml->addAttribute('targetNamespace', 'urn:oecd:ties:fatca:v2');
        $xml->addAttribute('elementFormDefault', 'qualified');
        $xml->addAttribute('attributeFormDefault', 'unqualified');
        $import = $xml->addChild('ftc:FATCA_OECD', 'PHP2: More Parser Stories', 'ftc');
        $import->addAttribute('namespace', 'urn:oecd:ties:isofatcatypes:v1');
        $import->addAttribute('schemaLocation', 'isofatcatypes_v1.1.xsd');

        $xml->saveXML('files/asd.xml');

        $response = \Response::make($xml->asXML(), 200);
        $response->header('Content-Type', 'text/xml');
        $response->header('Cache-Control', 'public');
        $response->header('Content-Description', 'File Transfer');
        $response->header('Content-Disposition', 'attachment; filename=test.xml');
        $response->header('Content-Transfer-Encoding', 'binary');

//        \File::put('public/.xml', $content);

//        $files = glob(public_path('public/*'));
//        $zipper = new Zipper();
//
//        $zipper->make('asd.zip')->add('public')->close();
//
//        return response()->download(public_path('asd.zip'));

//        $zipper = new Zipper;
//
//
//        $zipper->make('public/asd.zip')->folder('public')->add('public','asd.xml');
////        $zipper->zip('public/asd.zip')->folder('public/asd/asd');
//        $zipper->close();
//        dd($zipper );
//        $zipper->remove('composer.lock');
//
//        $zipper->folder('mySuperPackage')->add(
//            [
//                'vendor',
//                'composer.json'
//            ]
//        );
//
//        $zipper->getFileContent('mySuperPackage/composer.json');
//
//        $zipper->make('test.zip')->extractTo('',array('mySuperPackage/composer.json'),Zipper::WHITELIST);

//
//        $public_dir='public/files';
//        $zipFileName = 'testing.zip';
//        $zip = new Zipper;
//
//        if ($zip->make($public_dir . '/' . $zipFileName, Zipper::CREATE) === TRUE) {
//            $zip->add('file_path','file_name');
//            $zip->close();
//        }
//
//        $headers = array(
//            'Content-Type' => 'application/octet-stream',
//        );
//
//        $filetopath=$public_dir.'/'.$zipFileName;
//
//        if(file_exists($filetopath)){
//            return response()->download($filetopath,$zipFileName,$headers);
//        }
//
//        return ['status'=>'file does not exist'];

        return $response;
    }
}
