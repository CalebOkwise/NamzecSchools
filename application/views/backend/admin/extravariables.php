<?php

$website_goal = $this->db->get_where('website_settings', array("type" => "goal"))->row()->description ;
$website_mission = $this->db->get_where('website_settings', array("type" => "mission"))->row()->description ;
$website_vision = $this->db->get_where('website_settings', array("type" => "vision"))->row()->description;
$website_video_link = $this->db->get_where('website_settings', array("type" => "video_link"))->row()->description;
$website_about_us = $this->db->get_where('website_settings', array("type" => "about_us"))->row()->description;
$website_testimony_message = $this->db->get_where('website_settings', array("type" => "testimony_message"))->row()->description;
$website_map_code = $this->db->get_where('website_settings', array("type" => "map_code"))->row()->description;

?> 