<template>
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h1>Add Todo</h1>
        </div>
        <div class="card-body">
            <form-component></form-component>
        </div>
    </div>
</template>

<script>
import FormComponent from './FormComponent.vue';
export default {
    components: {
        FormComponent
    }
}
</script>