<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FusionInvoiceFOSS - Self hosted invoicing for freelancers and small businesses</title>
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand">
                <img src="/img/fi_logo2.png" style="float: left; margin-top: -10px;">
                <span style="padding-left: 10px;">FusionInvoiceFOSS</span>
            </a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="bs-sidebar">
                <h4>Versions</h4>
                <p style="padding-left: 15px; font-size: 1em;"><a href="#"><span class="label label-primary"
                                                                                 style="font-size: 1em;">FusionInvoiceFOSS v4.1.x</span></a>
                </p>
                <p style="padding-left: 15px; font-size: 1em;"><a href="#">FusionInvoiceFOSS v4.0.x</a></p>
                <h4>About FusionInvoiceFOSS</h4>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item" style="background-color: #eee;"><a class="nav-link"
                        href="Requirements">Requirements</a>
                    </li>
                    {{--<li class="nav-item" style="background-color: #eee;"><a class="nav-link"--}}
                    {{--href="{{ action('FI\Modules\Documentation\Controllers\DocumentationController@showPage', ['2018.About-FusionInvoice', 'Requirements']) }}">Requirements</a>--}}
                    {{--</li>--}}
                    <li class="nav-item"><a class="nav-link" href="License">License</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Support">Support</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Release-Notes">Release
                            Notes</a></li>
                </ul>
                <h4>Setup</h4>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item"><a class="nav-link" href="Installation">Installation</a></li>
                    <li class="nav-item"><a class="nav-link" href="Upgrade">Upgrade</a></li>
                    <li class="nav-item"><a class="nav-link" href="Task-Scheduler">Task Scheduler</a>
                    </li>
                </ul>
                <h4>User Guides</h4>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item"><a class="nav-link" href="Clients">Clients</a></li>
                    <li class="nav-item"><a class="nav-link" href="Quotes">Quotes</a></li>
                    <li class="nav-item"><a class="nav-link" href="Workorders">Workorders</a></li>
                    <li class="nav-item"><a class="nav-link" href="Invoices">Invoices</a></li>
                    <li class="nav-item"><a class="nav-link" href="Recurring-Invoices">Recurring
                            Invoices</a></li>
                    <li class="nav-item"><a class="nav-link" href="Payments">Payments</a></li>
                    <li class="nav-item"><a class="nav-link" href="Expenses">Expenses</a></li>
                    <li class="nav-item"><a class="nav-link" href="Time-Tracking">Time Tracking</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="Scheduler">Scheduler</a></li>
                    <li class="nav-item"><a class="nav-link" href="System-Settings">System
                            Settings</a></li>
                    <li class="nav-item"><a class="nav-link" href="Importing-Data">Importing
                            Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="REST-API">REST API</a></li>
                </ul>
                <h4>Customization</h4>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item"><a class="nav-link" href="Custom-Fields">Custom
                            Fields</a></li>
                    <li class="nav-item"><a class="nav-link" href="Invoice-Templates">Invoice
                            Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="Email-Templates">Email
                            Templates</a></li>
                    <li class="nav-item"><a class="nav-link"
                                            href="Translations">Translations</a></li>
                </ul>
                <h4>FAQ</h4>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item"><a class="nav-link" href="Frequently-Asked-Questions">Frequently
                            Asked Questions</a></li>
                </ul>
            </div>
        </div>
        @yield('content')
        {{--@include('documentation.2018.About-FusionInvoice.Requirements')--}}
        {{--<div class="col-lg-9 documentation">--}}
            {{--<h2>Requirements</h2>--}}
            {{--<hr>--}}
            {{--<p>--}}
                {{--FusionInvoiceFOSS is web-based software, so to install and use it, you must have a server environment of--}}
                {{--some sort.--}}
                {{--Please review the minimum requirements below to determine whether or not you will be able to install and--}}
                {{--use the--}}
                {{--software.--}}
            {{--</p>--}}
            {{--<ul>--}}
                {{--<li>A web server of some sort - Apache, nginx, etc.</li>--}}
                {{--<li>PHP >= 7.0.0</li>--}}
                {{--<li>OpenSSL PHP Extension</li>--}}
                {{--<li>PDO PHP Extension</li>--}}
                {{--<li>Mbstring PHP Extension</li>--}}
                {{--<li>Tokenizer PHP Extension</li>--}}
                {{--<li>XML PHP Extension</li>--}}
                {{--<li>DOM PHP Extension</li>--}}
                {{--<li>iconv PHP Extension</li>--}}
                {{--<li>Fileinfo PHP Extension (only if using the data import module)</li>--}}
                {{--<li>MySQL or MariaDB</li>--}}
                {{--<li>A modern and updated web browser</li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>
</div>
<br><br>
<div id="footer">
    <div class="container">
    </div>
</div>
</body>
</html>