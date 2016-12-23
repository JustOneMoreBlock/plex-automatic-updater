<?php

$distro = "centos-64bit";

if ($distro == "ubuntu-64bit") {
    $label = "Ubuntu 64-bit (10.04 Lucid or newer)";
} elseif ($distro == "ubuntu-32bit") {
    $label = "Ubuntu 32-bit (10.04 Lucid or newer)";
} elseif ($distro == "fedora-64bit") {
    $label = "Fedora 64-bit (RPM for Fedora 14 or newer)";
} elseif ($distro == "fedora-32bit") {
    $label = "Fedora 32-bit (RPM for Fedora 14 or newer)";
} elseif ($distro == "centos-64bit") {
    $label = "CentOS 64-bit (RPM for CentOS 6 or newer)";
} elseif ($distro == "centos-32bit") {
    $label = "CentOS 32-bit (RPM for CentOS 6 or newer)";
} else {
    $label = "Operating System or distro variable not set.";
}

function api($api)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api);
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    $req = json_decode(curl_exec($ch));
    curl_close($ch);
    Return $req;
}

$plex = api("https://plex.tv/api/downloads/1.json");

$releases = $plex->computer->Linux->releases;

foreach ($releases as $release) {
    if ($release->label == $label) {
         echo "Downloading: $release->url\r\n";
         //Install
         //shell_exec("INSTALL $release->url");
    }
}


?>
