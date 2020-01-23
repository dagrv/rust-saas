@foreach ($plans as $plan)
    <input type="radio" id="{{ $plan->name }}-plan" name="plan" @if($loop->first) checked @endif value="{{ $plan->name }}" class="radio-plan hidden">
    <label for="{{ ucfirst($plan->name) }}-plan" class="border-2 border-gray-300 w-full px-4 py-4 rounded-lg block mb-2">
        <div class="flex">
            <img src="/img/plans/{{ $plan->name }}.png" alt="plans" class="w-16 h-16 mr-3">
        
            <div>
                <span class="block">{{ $plan->name }}</span>
                <span class="text-xs text-gray-600">{{ $plan->description }}</span>
            </div>
        </div>
    </label>
@endforeach