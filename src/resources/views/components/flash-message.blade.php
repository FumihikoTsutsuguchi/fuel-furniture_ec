@props(['status' => 'info'])

@php
if($status === 'info'){$bgColor = 'bg-blue-300';}
if($status === 'alert'){$bgColor = 'bg-red-400';}
@endphp

@if(session('message'))
  <div class="{{ $bgColor }} w-1/2 mx-auto p-2 my-4 mb-12 text-white">
    {{ session('message' )}}
  </div>
@endif
