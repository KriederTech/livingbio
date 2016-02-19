<?php

function clean_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ctype_alspace($str)
{
    $allowed = array(' ');
    if (ctype_alpha(str_replace($allowed, '', $str)))
    {
        return true;
    }
    else
    {
        return false;
    }
}
function formatDate($date)
{
    $dateFormatted = $date;

    if ($date != '')
    {
        list($yyyy, $mm, $dd) = explode('-', $date);
        $dateFormatted = $mm.'/'.$dd.'/'.$yyyy;
    }

    return $dateFormatted;
}

function formatDateTime($datetime)
{
    $dateFormatted = $datetime;

    if ($datetime != '')
    {
        list($date, $time) = explode(' ', $datetime);
        list($yyyy, $mm, $dd) = explode('-', $date);
        $dateFormatted = $mm.'/'.$dd.'/'.$yyyy;
    }

    return $dateFormatted;
}

function formatPhone($phonenumber)
{
    $phoneFormatted = $phonenumber;

    if (strlen($phonenumber) == 10)
    {
        $phoneFormatted = '('.substr($phonenumber, 0, 3).') '.substr($phonenumber, 3, 3).'-'.substr($phonenumber, 6);
    }

    return $phoneFormatted;
}

function PDFtoJPGbase64($input)
{
    $desc = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'));

    $cmd = 'gs -dSAFER -dBATCH -sDEVICE=jpeg -dTextAlphaBits=4 -dGraphicsAlphaBits=4 -dFirstPage=1 -dLastPage=1 -r96 -q -sOutputFile=- -';

    $p = proc_open($cmd, $desc, $pipes);

    fwrite($pipes[0], base64_decode($input));
    fclose($pipes[0]);

    $output = base64_encode(stream_get_contents($pipes[1]));
    fclose($pipes[1]);

    proc_close($p);

    return $output;
}

function PDFsize($input)
{
    $desc = array(
        0 => array('pipe', 'r'),
        1 => array('pipe', 'w'));

    $cmd = 'pdfinfo - | grep "Page size:" | awk \'{print $3,":",$5}\'';

    $p = proc_open($cmd, $desc, $pipes);

    fwrite($pipes[0], base64_decode($input));
    fclose($pipes[0]);

    $output = stream_get_contents($pipes[1]);
    fclose($pipes[1]);

    proc_close($p);

    return explode(':', $output);
}
?>
