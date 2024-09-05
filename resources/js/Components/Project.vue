<template>
    <v-card max-width="384" width="100vw" class="mx-8">
        <v-img :src="project.image" height="200px" cover />
        <v-card-title> {{ project.title }} </v-card-title>
        <v-card-subtitle> {{ project.subtitle }} </v-card-subtitle>
        <v-card-text>
            <p>{{ project.description }}</p>
            <div class="d-flex flex-wrap ga-3 mt-3">
                <badge v-for="(tool, key) in project.tools" :key :tool icon />
            </div>
        </v-card-text>
        <v-card-actions>
            <v-btn
                variant="tonal"
                prepend-icon="mdi-github"
                link
                :href="project.repository"
                target="_blank"
            >
                REPOSITÓRIO
            </v-btn>
            <v-btn
                variant="tonal"
                prepend-icon="mdi-view-carousel"
                link
                :href="project.demo"
                target="_blank"
            >
                DEMONSTRAÇÃO
            </v-btn>
        </v-card-actions>
    </v-card>
</template>

<script setup lang="ts">
import Badge from "@/Components/Badge.vue";

const props = defineProps({
    project: {
        type: Object,
        required: true,
    },
});
</script>
