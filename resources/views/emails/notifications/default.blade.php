@extends('layouts.email')
@section('content')
<table style="background:#f9f9f9; text-align:center; margin:auto; border:none; width:800px;">
    <tr>
        <td style="text-align:center">
            <table style=" padding-top: 10px; padding-bottom: 10px; text-align:center; margin:auto; border:none; width:600px;">
                <tr>
                    <td>
                        <table  style=" padding-top: 10px; padding-bottom: 10px; text-align:center; margin:auto; border:none; width:600px;">
                            <tr>
                                <td style="font-size: 18px; padding-top: 20px; padding-bottom: 20px;  color: #293848; text-align:center; padding-bottom:43px;">Welcome to <span style="font-weight:bold; ">{{ config('app.name', 'Laravel') }}</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <table  style="background:#fff; text-align:center; margin:auto; border:none; width:600px;">
                                        <tr>
                                            <td  style="padding:35px 47px; border:1px solid #f0f0f0;">
                                                <h3 style="font-size:16px; color:#727272; text-align:left;">Hi{{ $name ? ' '.$name : '' }},</h3>
                                                <h4 style="font-size:16px; color:#727272; font-weight:normal; text-align:left;">{{ $msg ? $msg : '' }}</h4>
                                                @if($url)
                                                <p style="margin-top:50px; margin-bottom:20px;">
                                                    <a href="{{ url($url) }}" style=" font-size:14px; background:#1f609e; color:#fff; text-decoration: none; border-radius: 3px; padding: 14px 56px;">Get Started</a>
                                                </p>
                                                @endif
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top:40px; text-align:center; font-size:16px; color:#727272; font-weight:bold;" >{{ config('app.name', 'Laravel') }}</td>
                            </tr>                            
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>    
</table>
@endsection