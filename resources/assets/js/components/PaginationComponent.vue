<template>
    <nav>
        <ul class="pagination">
            <li class="page-item"
                :class="(meta.prev == null) ? 'disabled' : ''"
                @click="navigate(meta.current_page-1)">
                <a class="page-link" href="javascript:" aria-label="Previous">
                    <span>&laquo;</span>
                </a>
            </li>
            <li class="page-item"
                v-for="page in meta.last_page"
                v-if="(page - meta.current_page) <= 5 && (page - meta.current_page) >= 0"
                @click="navigate(page)"
            >
                <a class="page-link" href="javascript:">{{ page }}</a>
            </li>
            <li class="page-item"
                v-if="(meta.last_page - meta.current_page) > size+1"
            >
                <a class="page-link" href="javascript:">...</a>
            </li>
            <li class="page-item"
                v-if="(meta.last_page - meta.current_page) > size"
                @click="navigate(meta.last_page)"
            >
                <a class="page-link" href="javascript:">{{ meta.last_page }}</a>
            </li>
            <li class="page-item"
                :class="(meta.current_page === meta.last_page) ? 'disabled' : ''"
                @click="navigate(meta.current_page+1)">
                <a class="page-link" href="javascript:" aria-label="Next">
                    <span>&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
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