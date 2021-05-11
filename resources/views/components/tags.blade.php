<style>
    [x-cloak] {
        display: none;
    }

    .svg-icon {
        width: 1em;
        height: 1em;
    }

    .svg-icon path,
    .svg-icon polygon,
    .svg-icon rect {
        fill: #333;
    }

</style>

<div>
    <x-jet-label for="tags" value="{{ __('Tags') }}" />
    <select x-cloak id="select" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        @foreach ($tags as $tag )
        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
        @endforeach
    </select>
    <x-jet-input-error for="tags" class="mt-2" />
</div>

<div x-data="dropdown()" x-init="loadOptions()" class="w-full mx-auto">
    <input name="tags" type="hidden" x-bind:value="selectedValues()">

    <div class="relative inline-block w-full mb-4">
        <div class="relative flex flex-col items-center">

            <div x-on:click="open" class="w-full">
                <div class="flex p-1 my-2 bg-white border border-gray-200 rounded">
                    <div class="flex flex-wrap flex-auto">

                        <template x-for="(option,index) in selected" :key="options[option].value">

                            <div class="flex items-center justify-center px-1 py-1 m-1 font-medium bg-white border rounded">
                                <div class="flex-initial max-w-full text-xs font-normal leading-none" x-model="options[option]" x-text="options[option].text">
                                </div>

                                <div class="flex flex-row-reverse flex-auto">
                                    <div x-on:click.stop="remove(index,option)">
                                        <svg class="w-4 h-4 fill-current " role="button" viewBox="0 0 20 20">
                                            <path d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                    c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                    l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                    C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </template>
                        <div x-show="selected.length == 0" class="flex-1">
                            <input placeholder="Select Tags" class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none" x-bind:value="selectedValues()">
                        </div>
                    </div>
                    <div class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 border-l border-gray-200 svelte-1l8159u">

                        <button type="button" x-show="isOpen() === true" x-on:click="open" class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                            <svg version="1.1" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
        L17.418,6.109z" />
                            </svg>

                        </button>
                        <button type="button" x-show="isOpen() === false" @click="close" class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M2.582,13.891c-0.272,0.268-0.709,0.268-0.979,0s-0.271-0.701,0-0.969l7.908-7.83
        c0.27-0.268,0.707-0.268,0.979,0l7.908,7.83c0.27,0.268,0.27,0.701,0,0.969c-0.271,0.268-0.709,0.268-0.978,0L10,6.75L2.582,13.891z
        " />
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
            <div class="w-full px-4">
                <div x-show.transition.origin.top="isOpen()" class="absolute left-0 z-40 w-full bg-white rounded shadow top-100 max-h-select" x-on:click.away="close">
                    <div class="flex flex-col w-full overflow-y-auto">
                        <template x-for="(option,index) in options" :key="option" class="overflow-auto">
                            <div class="w-full border-b border-gray-200 rounded-t cursor-pointer hover:bg-gray-100" @click="select(index,$event)">
                                <div class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                    <div class="flex items-center justify-between w-full">
                                        <div class="mx-2 leading-6" x-model="option" x-text="option.text"></div>
                                        <div x-show="option.selected">
                                            <svg class="svg-icon" viewBox="0 0 20 20">
                                                <path fill="none" d="M7.197,16.963H7.195c-0.204,0-0.399-0.083-0.544-0.227l-6.039-6.082c-0.3-0.302-0.297-0.788,0.003-1.087
                                                    C0.919,9.266,1.404,9.269,1.702,9.57l5.495,5.536L18.221,4.083c0.301-0.301,0.787-0.301,1.087,0c0.301,0.3,0.301,0.787,0,1.087
                                                    L7.741,16.738C7.596,16.882,7.401,16.963,7.197,16.963z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function dropdown() {
        return {
            options: []
            , selected: []
            , show: false
            , open() {
                this.show = true
            }
            , close() {
                this.show = false
            }
            , isOpen() {
                return this.show === true
            }
            , select(index, event) {

                if (!this.options[index].selected) {

                    this.options[index].selected = true;
                    this.options[index].element = event.target;
                    this.selected.push(index);

                } else {
                    this.selected.splice(this.selected.lastIndexOf(index), 1);
                    this.options[index].selected = false
                }
            }
            , remove(index, option) {
                this.options[option].selected = false;
                this.selected.splice(index, 1);


            }
            , loadOptions() {
                const options = document.getElementById('select').options;
                for (let i = 0; i < options.length; i++) {
                    this.options.push({
                        value: options[i].value
                        , text: options[i].innerText
                        , selected: options[i].getAttribute('selected') != null ? options[i].getAttribute('selected') : false
                    });
                }


            }
            , selectedValues() {
                return this.selected.map((option) => {
                    return this.options[option].value;
                })
            }
        }
    }

</script>
