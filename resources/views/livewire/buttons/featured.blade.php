<div class="m-2 toggle colour">
    <input wire:model="featured" type="checkbox" name="toggle" id="{{ $name.$post->id }}" class="hidden toggle-checkbox">
    <label for="{{ $name.$post->id }}" class="block w-12 h-6 duration-150 ease-out rounded-full cursor-pointer transition-color toggle-label"></label>
</div>
