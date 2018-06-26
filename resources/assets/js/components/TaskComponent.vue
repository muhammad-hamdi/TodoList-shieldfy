<template>
    <a href="#" class="list-group-item list-group-item-action">
        {{ todo.content }}
    </a>
</template>

<script>
export default {
    props: ['todo']
}
</script>