<?php


namespace OC\PlatformBundle\Services;


class Antispam
{

    public function __construct(\Swift_Mailer $mailer, $locale, $minlenght)
    {
        $this->mailer    = $mailer;
        $this->locale    = $locale;
        $this->minlenght = $minlenght;
    }

    public function isSpam($text)
    {
        return strlen($text) < $this->minlenght;
    }
}