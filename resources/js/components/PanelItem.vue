<template>
    <div
        class="flex flex-col md:flex-row -mx-6 px-6 py-2 md:py-0 space-y-2 md:space-y-0 prism-field" :class="field.fullWidth? 'prism-field-w-full' : 'prism-field-default'"
        :dusk="field.attribute"
    >
        <div class="md:w-1/4 md:py-3" v-if="!field.fullWidth">
            <slot>
                <h4 class="font-normal">
                    <span>{{ label }}</span>
                </h4>
            </slot>
        </div>
        <div class="break-all lg:break-words md:py-3" :class="field.fullWidth ? 'w-full' : 'md:w-3/4'">
            <slot name="value">
                <div class="line-numbers" v-html="fieldValue"/>
            </slot>
        </div>
    </div>
</template>

<script>
import { FieldValue } from 'laravel-nova'
import Prism from "./../prism";
import "prismjs/plugins/toolbar/prism-toolbar.min.css";
import "prismjs/plugins/toolbar/prism-toolbar.min";
import "prismjs/plugins/copy-to-clipboard/prism-copy-to-clipboard.min";
import "prismjs/plugins/show-language/prism-show-language.min";
import "prismjs/plugins/line-numbers/prism-line-numbers.min";
import "prismjs/plugins/line-numbers/prism-line-numbers.min.css";

export default {
    mixins: [FieldValue],

    props: {
        field: {
            type: Object,
            required: true,
        },
    },

    mounted() {
        window.Prism = window.Prism || {};
        window.Prism.manual = true;
        Prism.highlightAll(); // highlight your code on mount

        console.log(this.field)
    },
}
</script>
