@foreach ($plans as $plan)
    <input type="radio" id="{{ $plan->name }}-plan" name="plan" @if(auth()->user()->plan->name == $plan->name) checked @endif value="{{ $plan->name }}" class="radio-plan hidden">
    <label for="{{ ucfirst($plan->name) }}-plan" class="border-2 border-gray-300 w-full px-4 py-4 rounded-lg block mb-3 relative">
        <div class="flex">
            <img src="/img/plans/{{ $plan->name }}.png" alt="plans" class="w-16 h-16 mr-3">
        
            <div>
                <span class="block">{{ $plan->name }}</span>
                <span class="text-xs text-gray-600">{{ $plan->description }}</span>
                
                <span class="absolute right-0 bottom-0 bg-green-200 text-green-800 font-bold rounded-br rounded-tl-lg text-xs px-2 py-1">
                    @if ($plan->name == 'Basic')
                        9€ / month
                    @elseif ($plan->name == 'Plus')
                        17€ / month
                    @elseif ($plan->name == 'Pro')
                        25€ / month
                    @endif
                </span>
            </div>
        </div>
    </label>
@endforeach