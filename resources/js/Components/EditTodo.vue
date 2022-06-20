<template>
    <bootstrap-modal :show="modalStatus" @hide="reset">
        <template #title>
            {{ modalTitle }}
        </template>
        <template v-if="modalStatus">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input
                    type="text"
                    class="form-control"
                    v-model="editingItem.title"
                    :class="{'is-invalid': editingItem.errors.title}"
                />
                <div v-if="editingItem.errors.title" class="d-block invalid-feedback">
                    {{ editingItem.errors.title }}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Category</label>
                <select class="form-select" v-model="editingItem.category_id">
                    <option :value="null">Without category</option>
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                        v-text="category.title"
                        :class="{'is-invalid': editingItem.errors.category_id}"
                    ></option>
                </select>
                <div v-if="editingItem.errors.category_id" class="d-block invalid-feedback">
                    {{ editingItem.errors.category_id }}
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea
                    class="form-control"
                    v-model="editingItem.description"
                    rows="5"
                    :class="{'is-invalid': editingItem.errors.description}"
                ></textarea>
                <div v-if="editingItem.errors.description" class="d-block invalid-feedback">
                    {{ editingItem.errors.description }}
                </div>
            </div>
        </template>
        <template #footer>
            <button
                type="button"
                class="btn btn-primary"
                @click="save"
                :disabled="!enableSaveButton"
            >
                {{ saveButtonText }}
            </button>
        </template>
    </bootstrap-modal>
</template>

<script setup>
import { ref, computed } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";
import BootstrapModal from "@/Components/BootstrapModal.vue";
import route from "../../../vendor/tightenco/ziggy/src/js";

const props = defineProps({
    categories: {
        type: Array,
        default: [],
    },
});

const editingItem = ref(null);

const edit = (item) => {
    if (item) {
        editingItem.value = useForm(item);
    } else {
        editingItem.value = useForm({
            title: "",
            description: "",
            category_id: null,
        });
    }
};

const reset = () => {
    editingItem.value = null;
};

const save = () => {
    if (editingItem.value.id) {
        editingItem.value.put(route("todos.update", editingItem.value.id), {
            preserveScroll: true,
            onSuccess: () => reset(),
        });
    } else {
        editingItem.value.post(route("todos.store"), {
            preserveScroll: true,
            onSuccess: () => reset(),
        });
    }
};

const modalStatus = computed(() => Boolean(editingItem.value));

const dirtyStatus = computed(() => editingItem.value?.isDirty);

const modalTitle = computed(() =>
    editingItem.value?.id ? "Editing item" : "Creating item"
);

const saveButtonText = computed(() =>
    editingItem.value?.id ? "Update" : "Create"
);

const enableSaveButton = computed(
    () => editingItem.value?.isDirty && !editingItem.value.processing
);

defineExpose({
    edit,
});
</script>