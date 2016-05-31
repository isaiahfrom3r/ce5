        <header id="header" class="clearfix" data-ma-theme="bluegray">
            <ul class="h-inner">
                <li class="hi-trigger ma-trigger" data-ma-action="sidebar-open" data-ma-target="#sidebar">
                    <div class="line-wrap">
                        <div class="line top"></div>
                        <div class="line center"></div>
                        <div class="line bottom"></div>
                    </div>
                </li>

                <li class="hi-logo hidden-xs">
                    <a href="<?php echo base_url(); ?>admin"><?=$this->options->get('site_name')?></a>
                </li>


            </ul>

            <!-- Top Search Content -->
            <div class="h-search-wrap">
                <div class="hsw-inner">
                    <i class="hsw-close zmdi zmdi-arrow-left" data-ma-action="search-close"></i>
                    <input type="text">
                </div>
            </div>
        </header>

        <section id="main">
            <aside id="sidebar" class="sidebar c-overflow">


                <ul class="main-menu">
	                
                    <li>
                        <a href="index.html"><i class="zmdi zmdi-view-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="/admin/cms"><i class="zmdi zmdi-collection-text"></i> CMS</a>
                    </li>
                    <li>
                        <a href="/admin/meta"><i class="zmdi zmdi-view-web"></i> Meta</a>
                    </li>
                    
                    <li class="sub-menu">
                        <a href="" data-ma-action="submenu-toggle"><i class="zmdi zmdi-view-compact"></i> Fill</a>

                        <ul>
                            <li><a href="textual-menu.html">List</a></li>
                            <li><a href="image-logo.html">Image logo</a></li>
                            <li><a href="top-mainmenu.html">Mainmenu on top</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="typography.html"><i class="zmdi zmdi-format-underlined"></i> Typography</a></li>
                   
                </ul>
            </aside>


       
