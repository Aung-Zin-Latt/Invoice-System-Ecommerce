<div>
    <style>
        .alert-danger {
            color: red;
        }
    </style>
    <input type="file" wire:model="image">
    @error('image') <span class="alert alert-danger">{{ $message }}</span> @enderror
    <br>
    <button wire:click="upload">Upload</button>
</div>
