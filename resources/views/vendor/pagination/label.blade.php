@if ($paginator->hasPages())
    <div class="mb-3 mb-lg-0">
        <p class="mb-0">
           <strong>{{ $paginator->count() }} / {{ $paginator->total() }}</strong>
           Items found
        </p>
     </div>

@endif
