<?php
/**
 * Created by PhpStorm.
 * User: wes_x
 * Date: 5/4/2018
 * Time: 6:51 AM
 */
?>
@section("css")
    <link href='{{asset("assets/css/bootstrap.min.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/bootstrap-grid.min.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/bootstrap-reboot.min.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/font-awesome.min.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/mdb.min.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/style.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/bootstrap-toggle.min.css")}}' rel='stylesheet'>
    <link href='{{asset("assets/css/bootstrap.bundle.min.css")}}' rel='stylesheet'>
@endsection

@section("js")
    <script src='{{asset("assets/js/jquery-3.2.1.min.js")}}'></script>
    <script src='{{asset("assets/js/bootstrap.min.js")}}'></script>
    <script src='{{asset("assets/js/bootstrap.bundle.min.js")}}'></script>
    <script src='{{asset("assets/js/mdb.min.js")}}'></script>
    <script src='{{asset("assets/js/popper.minmin.js")}}'></script>
    <script src='{{asset("assets/js/bootstrap-toggle.min.js")}}'></script>
    <script src='{{asset("assets/js/sweetalert2.all.js")}}'></script>
    <script src='{{asset("assets/js/Sistema.js")}}'></script>
    <script src='{{asset("assets/js/Fila.js")}}'></script>
@endsection


@extends("layout.menu",["tipo"=>session("tipo")])