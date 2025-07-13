<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
const props = defineProps<{ users: { id: number; name: string }[] }>();

const form = useForm({
    user_id: '',
    title: '',
    description: '',
    deadline: '',
});

const submit = () => {
    form.post(route('tasks.store'), {
        onSuccess: () => {
            form.reset();
        },
    });
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Tasks',
        href: '/tasks/create',
    },
];
</script>

<template>
    <Head title="Tasks" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form @submit.prevent="submit" class="mx-auto max-w-[35rem]">
                <p class="mb-10 py-10 text-xl font-bold">Create Task</p>
                <div class="space-y-2">
                    <label for="Task Name">Name</label>
                    <Input v-model="form.title" type="text" placeholder="" />
                    <div v-if="form.errors.title" class="text-sm text-red-500">{{ form.errors.title }}</div>
                </div>
                <div class="grid grid-cols-2 gap-4 py-8">
                    <div>
                        <label for="user_id" class="block text-sm font-medium">Assign To</label>
                        <select v-model="form.user_id" class="w-full rounded-md border border-4 p-2">
                            <option value="">Select User</option>
                            <option v-for="user in props.users" :key="user.id" :value="user.id">
                                {{ user.name }}
                            </option>
                        </select>
                        <div v-if="form.errors.user_id" class="text-sm text-red-500">{{ form.errors.user_id }}</div>
                    </div>
                    <div class="space-y-2">
                        <label for="Task deadline">Deadline</label>
                        <Input v-model="form.deadline" type="date" placeholder="" />
                        <div v-if="form.errors.deadline" class="text-sm text-red-500">{{ form.errors.deadline }}</div>
                    </div>
                </div>
                <div class="space-y-2">
                    <label for="Task Name">Description</label>
                    <textarea v-model="form.description" rows="3" class="w-full rounded-md border p-2"></textarea>
                    <div v-if="form.errors.deadline" class="text-sm text-red-500">{{ form.errors.description }}</div>
                </div>

                <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                    <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                    Submit
                </Button>
            </form>
        </div>
    </AppLayout>
</template>
