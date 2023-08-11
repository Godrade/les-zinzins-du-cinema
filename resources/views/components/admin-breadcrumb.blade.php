@props([
    'title' => $title ?? '',
    'breadcrumb' => $breadcrumb ?? '',
    'breadcrumb_active' => $breadcrumb_active ?? ''
])

<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
                    @if ($breadcrumb)
                        <li class="breadcrumb-item"><a href="javascript: void(0)">{{ $breadcrumb }}</a></li>
                    @endif
                    @if($breadcrumb_active)
                        <li class="breadcrumb-item" aria-current="page">{{ $breadcrumb_active }}</li>
                    @endif
                </ul>
            </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h2 class="mb-0">{{ $title }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
