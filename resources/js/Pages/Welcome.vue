<template>
    <div>
        <h1>Welcome to Inertia + Vue.js</h1>
        <p>{{ message }}</p>
    </div>
</template>

<script>
export default {
    props: {
        message: String,
    },
};
</script>
