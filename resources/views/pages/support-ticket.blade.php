@extends('Layout.Layout')

@section("style")

<style>
    .support_ticket {
        height: 800px;
    }
    
 </style>

@endsection

@section("content")
<x-filtter :value="__('DisabledShortBy')" :filterIcon="__('d-none')">Support Ticket</x-filtter>
     <!-- //Design here -->
     <div class="bg-light-blue pt-50 pb-50">
      <div class="container">
        <img src="https://i0.wp.com/epp.solar/wp-content/uploads/2023/01/support-ticket-01-scaled.jpg?fit=2560%2C533&ssl=1"
            alt="">
        <div class="row">
          <div class="col-md-12">
            <iframe loading="lazy" class="support_ticket entered lazyloaded shadow border"
            src="https://stegback.com/api/ticket_generate/2/0" data-rocket-lazyload="fitvidscompatible"
            data-lazy-src="https://stegback.com/api/ticket_generate/2/0" data-ll-status="loaded"></iframe>
          </div>
       
          
        </div>
    </div>
     </div>
</div>
<!-- //Design here -->
@endsection