<?php

class SettingBase
{
    // Public Properties
    public int $sr_no;
    public string $site_title;
    public string $site_about;
    public bool $shutdown;

    // Constructor
    public function __construct(
        int    $sr_no,
        string $site_title,
        string $site_about,
        bool   $shutdown
    )
    {
        $this->sr_no = $sr_no;
        $this->site_title = $site_title;
        $this->site_about = $site_about;
        $this->shutdown = $shutdown;
    }
}
