<script setup lang="ts">
import Button from '@/components/ui/button/Button.vue';
import Input from '@/components/ui/input/Input.vue';
import Label from '@/components/ui/label/Label.vue';
import { Select, SelectContent, SelectItem, SelectTrigger, SelectValue } from '@/components/ui/select';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';

interface User {
    id: number;
    name: string;
    email: string;
    password: string;
    role: string;
}

const props = defineProps<{ user: User }>();

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    role: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.put(route('users.update', { user: props.user }));
};

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edit Users',
        href: '/users/edit',
    },
];
</script>

<template>
    <Head title="Create a new User" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="p-4">
            <form @submit.prevent="submit" class="mx-auto mt-20 flex w-8/20 flex-col gap-6">
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="name">Name</Label>
                        <Input
                            id="name"
                            type="text"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="name"
                            v-model="form.name"
                            placeholder="Full name"
                        />
                        <InputError :message="form.errors.name" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="email">Email address</Label>
                        <Input
                            id="email"
                            type="email"
                            required
                            :tabindex="2"
                            autocomplete="email"
                            v-model="form.email"
                            placeholder="email@example.com"
                        />
                        <InputError :message="form.errors.email" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="password">Password</Label>
                        <Input
                            id="password"
                            type="password"
                            :tabindex="3"
                            autocomplete="new-password"
                            v-model="form.password"
                            placeholder="Password"
                        />
                        <InputError :message="form.errors.password" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="password_confirmation">Confirm password</Label>
                        <Input
                            id="password_confirmation"
                            type="password"
                            :tabindex="4"
                            autocomplete="new-password"
                            v-model="form.password_confirmation"
                            placeholder="Confirm password"
                        />
                        <InputError :message="form.errors.password_confirmation" />
                    </div>

                    <div class="grid gap-2">
                        <Label for="role">Role</Label>
                        <Select v-model="form.role">
                            <SelectTrigger class="w-[180px]">
                                <SelectValue placeholder="Select a Role" />
                            </SelectTrigger>
                            <SelectContent>
                                <SelectGroup>
                                    <SelectLabel>Roles</SelectLabel>
                                    <SelectItem value="admin"> admin </SelectItem>
                                    <SelectItem value="user"> user </SelectItem>
                                </SelectGroup>
                            </SelectContent>
                        </Select>

                        <div v-if="form.errors.role" class="text-sm text-red-500">{{ form.errors.role }}</div>
                    </div>

                    <Button type="submit" class="mt-2 w-full" tabindex="5" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin" />
                        Edit user
                    </Button>
                </div>
            </form>
        </div>
    </AppLayout>
</template>
