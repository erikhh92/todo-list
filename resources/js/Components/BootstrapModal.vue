<template>
    <teleport to="body">
        <div class="modal" tabindex="-1" ref="modalDiv">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-if="$slots.title">
                            <slot name="title"></slot>
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            aria-label="close"
                            @click="_hide"
                        ></button>
                    </div>
                    <div class="modal-body">
                        <slot></slot>
                    </div>
                    <div v-if="$slots.footer" class="modal-footer">
                        <slot name="footer"></slot>
                    </div>
                </div>
            </div>
        </div>
    </teleport>
</template>

<script setup>
import { Modal } from "bootstrap";
import {
    ref,
    reactive,
    computed,
    watch,
    onMounted,
    onBeforeUnmount,
} from "vue";

const props = defineProps({
    show: Boolean,
    modelValue: Boolean,
});

const emit = defineEmits([
    "update:modelValue",
    "show",
    "shown",
    "hide",
    "hidden",
    "hidePrevented",
]);

const modalDiv = ref(null);

const modalElement = ref(null);
const events = ref(["show", "shown", "hide", "hidden", "hidePrevented"]);

const _runEvent = (eventType) => {
    if (eventType == "shown") {
        computedValue.value = true;
    }

    if (eventType == "hidden") {
        computedValue.value = false;
    }

    emit(eventType);
};

const _show = () => {
    modalElement.value.show();
};

const _hide = () => {
    modalElement.value.hide();
};

const computedValue = computed({
    get() {
        return props.modelValue;
    },
    set(value) {
        emit("update:modelValue", value);
    },
});

watch(
    () => props.modelValue,
    (value) => {
        if (modalElement.value) {
            value ? _show() : _hide();
        }
    }
);

watch(
    () => props.show,
    (value) => {
        value ? _show() : _hide();
    }
);

onMounted(() => {
    modalElement.value = new Modal(modalDiv.value);

    events.value.forEach((event) => {
        modalDiv.value.addEventListener(`${event}.bs.modal`, () => {
            _runEvent(event);
        });
    });

    if (props.modelValue || props.show) {
        _show();
    }
});

onBeforeUnmount(() => {
    events.value.forEach((event) => {
        modalDiv.value.removeEventListener(`${event}.bs.modal`, () => {
            _runEvent(event);
        });
    });
});
</script>
