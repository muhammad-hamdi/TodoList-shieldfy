<template>
    <div class="text-center">
        <nav v-if="meta.current_page">
            <button class="btn btn-primary"
                    :class="(meta.prev == null) ? 'disabled' : ''"
                    :disabled="meta.prev == null"
                    @click="navigate(1)">
                First
            </button>
            <button class="btn btn-primary"
                    :class="(meta.prev == null) ? 'disabled' : ''"
                    :disabled="meta.prev == null"
                    @click="navigate(meta.current_page-1)">
                &laquo; Previous
            </button>
            <span class="m-2">
            {{ `${meta.current_page} of ${meta.last_page}`  }}
        </span>
            <button class="btn btn-primary"
                    :class="(meta.current_page === meta.last_page) ? 'disabled' : ''"
                    :disabled="meta.current_page === meta.last_page"
                    @click="navigate(meta.current_page+1)">
                Next &raquo;
            </button>
            <button class="btn btn-primary"
                    :class="(meta.current_page === meta.last_page) ? 'disabled' : ''"
                    :disabled="meta.current_page === meta.last_page"
                    @click="navigate(meta.last_page)">
                Last
            </button>
        </nav>
    </div>
</template>

<script>
export default {
    props: {
        meta: {
            required: true
        },
        size: {
            default: 5
        }
    },
    methods: {
        navigate(page) {
            this.$emit('navigate', page);
        }
    }
}
</script>