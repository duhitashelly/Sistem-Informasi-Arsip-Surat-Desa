@extends('layouts.dashboard')

@section('title','Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-sm font-semibold text-gray-500 uppercase">Today's Money</h3>
    <p class="text-2xl font-bold">$53,000</p>
  </div>
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-sm font-semibold text-gray-500 uppercase">Users</h3>
    <p class="text-2xl font-bold">2,300</p>
  </div>
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-sm font-semibold text-gray-500 uppercase">New Clients</h3>
    <p class="text-2xl font-bold">+3,462</p>
  </div>
  <div class="bg-white rounded-xl shadow p-6">
    <h3 class="text-sm font-semibold text-gray-500 uppercase">Sales</h3>
    <p class="text-2xl font-bold">$103,430</p>
  </div>
</div>
@endsection
