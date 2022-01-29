@extends('layouts.store')
@section('title', 'Home')
@section('content')
<div class="row mt-3">
    <h1 class="text-center">About us</h1>
</div>
<div class="row">
    <div class="col-md-2">
        <img src="{{asset('profile.jpg')}}" height="200" class="rounded-circle img-fluid">
    </div>
    <div class="col-md-10 bg-light">
        <h5>Development By Patipat Chewprecha</h5>
        <small>ระบบนี้ถูกพัฒนาโดยใช้ภาษา PHP และ Laravel Framework 8 เป็นระบบแสดงผลผลิตภัณฑ์ในร้านค้า สามารถทำการเพิ่ม ลบ แก้ไข </small>
        <br>
        <small>สามารถเข้าใช้งานด้วย </small>
        <table>
            <tr>
                <td>User</td>
                <td><mark>admin@myshop.com</mark></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><mark>admin</mark></td>
            </tr>
        </table>
    </div>
    <div class="row mt-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15497.007876119635!2d100.2927912188166!3d13.823902830579605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e2930e1a22ba2d%3A0x542845334a15fc3f!2zMTPCsDQ5JzEyLjMiTiAxMDDCsDE3JzM5LjQiRQ!5e0!3m2!1sen!2sth!4v1643462534022!5m2!1sen!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
@stop
