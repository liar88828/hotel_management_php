<?php

class SettingBase
{
    // Public Properties
    public int $sr_no;
    public string $site_title;
    public string $site_about;
    public bool $description_about;

    // Constructor
    public function __construct(
        int    $sr_no,
        string $site_title,
        string $site_about,
        string $description_about
    )
    {
        $this->sr_no = $sr_no;
        $this->site_title = $site_title;
        $this->site_about = $site_about;
        $this->description_about = $description_about;
    }
}
