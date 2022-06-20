<template>
    <div class="col-sm-6 col-lg-4 mb-4">
        <div class="card" :style="{'background-color': item.category?.color}">
            <div class="card-body">
                <h5 class="card-title">
                    <font-awesome-icon fixed-width :icon="iconName"/>
                    {{ item.title }}
                </h5>
                {{ item.description }}
            </div>
            <div class="card-footer">
                <button class="btn btn-outline-secondary me-2" @click="emit('delete', item.id)">
                    <font-awesome-icon fixed-width icon="trash"/>
                </button>
                <button class="btn btn-outline-secondary me-2" @click="emit('edit', item)">
                    <font-awesome-icon fixed-width icon="pencil"/>
                </button>
                <button class="btn btn-outline-secondary" v-if="!item.completed_at" @click="emit('complete', item.id)">
                    <font-awesome-icon fixed-width icon="check"/>
                </button>
                <button class="btn btn-outline-secondary" v-else @click="emit('uncomplete', item.id)">
                    <font-awesome-icon fixed-width icon="xmark"/>
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
import { computed } from "vue";

const emit = defineEmits([
    'complete',
    'uncomplete',
    'edit',
    'delete'
]);

const props = defineProps({
    item: Object,
});

const iconName = computed(() => props.item.category ? props.item.category.icon : 'note-sticky');

</script>