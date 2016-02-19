<?php

echo('<span class="breadcrumbs">&larr; <a href="home.php"> Back to Home</a></span>'."\n");
echo('        <h3>My Medical Records</h3>'."\n");
echo('        <section>'."\n");
echo('            <div class="info-wrap">'."\n");

$medicalrecords = MedicalRecordDB::getMedicalRecords($userId)->getMedicalRecords()->getMedicalRecord();
$count = sizeof($medicalrecords);

$_SESSION['add'] = null;
$_SESSION['img']['doc_id'] = array();
$_SESSION['img']['document'] = array();

if ($count > 0)
{
    for($i = 0; $i < $count; $i++)
    {
        $document = clean_input($medicalrecords[$i]->getDocument());
        $doc_id = clean_input($medicalrecords[$i]->getDoc_id());
        $doc_name = clean_input($medicalrecords[$i]->getDoc_name());
        $doc_date = clean_input($medicalrecords[$i]->getDoc_date());
        $doc_caption = clean_input($medicalrecords[$i]->getDoc_caption());

        array_push($_SESSION['img']['doc_id'], $doc_id);
        array_push($_SESSION['img']['document'], $document);

        fileBox($document, $doc_id, $doc_name, $doc_date, $doc_caption);
    }
}

addBox();

echo('            </div>'."\n");
echo('        </section>'."\n");

function fileBox($document, $doc_id, $doc_name, $doc_date, $doc_caption) 
{
    $imgdata = base64_decode($document);
    $f = finfo_open();
    $mime_type = finfo_buffer($f, $imgdata, FILEINFO_MIME_TYPE);

    $src = 'data:'.$mime_type.';base64,'.$document;

    list($tmp1, $tmp2) = explode('/', $mime_type);
    $doc_type = strtoupper($tmp2);

    if (eregi('image/', $mime_type))
    {
        if (function_exists('getimagesizefromstring'))
        {
            $imageinfo = getimagesizefromstring($imgdata);
        }
        else
        {
            $uri = 'data://application/octet-stream;base64,'.$document;
            $imageinfo = getimagesize($uri);
        }
        $width = $imageinfo[0];
        $height = $imageinfo[1];
    }
    else if ($mime_type == 'application/pdf')
    {
        $output = PDFtoJPGbase64($document);
        $src = 'data:image/jpeg;base64,'.$output;
        $dimens = PDFsize($document);
        $width = trim($dimens[0]);
        $height = trim($dimens[1]);
    }
    else
    {
        $width = 500;
        $height = 500;
    }

    echo('                <div class="info"> '."\n");
    echo('                    <div class="gboxes">'."\n");
    echo('                        <div class="gbox1"> '."\n");
    echo('                              <a href="record_image.php?id='.$doc_id.'" onclick="return popupImage(this, \'Image\', '.$width.', '.$height.')"><img class="img-zoom" src="'.$src.'" alt="'.$doc_name.'"></a>'."\n");
    echo('                            <p>'."\n");
    echo('                            <span class="small-title2">'.$doc_name.'</span><span class="info-right">'.$doc_type.'</span><br>'."\n");
    echo('                            <sub class="info-left">Updated on '.formatDateTime($doc_date).'</sub><br>'."\n");
    echo('                            '.$doc_caption."\n");
    echo('                        </div>'."\n");
    echo('                    </div>'."\n");
    echo('                </div>'."\n");
}

function addBox()
{
    echo('                <div class="info">'."\n");
    echo('                    <div class="gboxes">'."\n");
    echo('                        <div class="gbox1">'."\n");
    echo('                            <p class="addfile">'."\n");
    echo('                                <img src="img/add.png" alt="Add"><br>'."\n");
    echo('                                <a href="record_add.php" onclick="return popup(this, \'Add\')">Add Another File</a>'."\n");
    echo('                            </p>'."\n");
    echo('                        </div>'."\n");
    echo('                    </div>'."\n");
    echo('                    <div class="greysub">'."\n");
    echo('                        <a href="#"></a>'."\n");
    echo('                    </div>'."\n");
    echo('                </div>'."\n");
}
?>
