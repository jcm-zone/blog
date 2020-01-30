<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
      body{
        font-family: arial;
        font-size: 14px;
        font-weight: 300;
        background-color: #e3e3e3;
        padding: 10px;
      }
      .inner-slots td{
        padding-top: 10px;
      }
      td{
        vertical-align: top
      }
    </style>
  </head>
  <body style="font-family: arial; font-size: 14px; color:#000; background:#fff;">
      <div style="width: 100%">
          @yield('content')
      </div>
  </body>
</html>    