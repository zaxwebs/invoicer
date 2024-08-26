@use(Illuminate\Support\Number)

@props(['value'])

<span>
	{{ Number::currency($value) }}
</span>