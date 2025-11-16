@props(['employer', 'width'=>90])

@php
    // Check if the employer has a logo AND if the file actually exists
    $logoPath = $employer->logo;

    if ($logoPath && Storage::disk('public')->exists($logoPath)) {
        // File exists → use actual logo
        $logo = Storage::url($logoPath);
    } else {
        // File missing → use picsum fallback
        $logo = "https://picsum.photos/seed/" . rand(1, 10000) . "/$width";
    }
@endphp


<img src="{{ $logo  }}" class="rounded-xl" width="{{$width}}" alt="">
