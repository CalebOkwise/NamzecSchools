<!--Header Wrap Start-->
    <header>
    	<!--Top Strip Wrap Start-->
        <div class="top_strip">
        	<div class="container">
                <div class="top_location_wrap">
                    <p><i class="fa fa-map-marker"></i>
                    <?php echo $this->db->get_where('settings', array('type'=> 'address'))->row()->description; ?>
                    </p>
                </div>
                <div class="top_ui_element">
                    <ul>
                        <?php
                            $temporary_mail = $this->db->get_where('settings', array('type'=> 'system_email'))->row()->description;
                            $temporary_tel = $this->db->get_where('settings', array('type'=> 'phone'))->row()->description;
                        ?>
                        <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo $temporary_mail;?>"><?php echo $temporary_mail ?></a></li>
                        <li><i class="fa fa-phone"></i> <a href="tel:<?php echo $temporary_tel ?>"> <?php echo $temporary_tel; ?> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--Top Strip Wrap End-->
