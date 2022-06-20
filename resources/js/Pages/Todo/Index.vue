<template>
    <layout title="TO-DO List">
        <div>
            <div class="row mb-3">
                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" v-model="filter">
                            <option :value="null">Both</option>
                            <option value="completed">Completed</option>
                            <option value="uncompleted">Uncompleted</option>
                        </select>
                        <label>Show tasks</label>
                    </div>
                </div>

                <div class="col">
                    <div class="form-floating">
                        <select class="form-select" v-model="orderBy">
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                        <label>Order by creation date</label>
                    </div>
                </div>
                <div class="col">
                    <button
                        type="button"
                        class="btn btn-primary w-100"
                        style="height: calc(3.5rem + 2px); line-height: 1.25"
                        @click="editItem()"
                    >
                        <font-awesome-icon icon="plus" />
                        Add TO-DO
                    </button>
                </div>
            </div>
            <div class="row">
                <todo-element
                    v-for="todo in todos"
                    :key="todo.div"
                    :item="todo"
                    @complete="completeItem"
                    @uncomplete="uncompleteItem"
                    @edit="editItem"
                    @delete="deleteItem"
                />
            </div>
        </div>
        <edit-todo :categories="categories" ref="editItemElement" />
    </layout>
</template>

<script setup>
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Layout from "@/Layouts/NoUserLayout.vue";
import TodoElement from "@/Components/TodoElement.vue";
import EditTodo from "@/Components/EditTodo.vue";

const props = defineProps(["todos", "categories"]);

//Reference to DOM element
const editItemElement = ref(null);

const editItem = (item = null) => {
    editItemElement.value.edit(item);
};

const orderBy = ref("asc");

const filter = ref(null);

const deleteItem = (itemId) => {
    Inertia.delete(route("todos.destroy", itemId));
};

const completeItem = (itemId) => {
    Inertia.patch(route("todos.complete", itemId));
};

const uncompleteItem = (itemId) => {
    Inertia.patch(route("todos.uncomplete", itemId));
};

const refreshItems = () => {
    console.log('refreshItems');
    console.log(route().current())
    Inertia.get(route(route().current()), {
        orderBy: orderBy.value,
        ...(filter.value && {
            filter: filter.value
        })
    }, {
        preserveState: true,
        preserveScroll: true
    });
}

watch(() => orderBy.value, () => {
    refreshItems()
})

watch(() => filter.value, () => {
    refreshItems()
})
</script>
