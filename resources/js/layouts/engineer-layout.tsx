import AppLayoutTemplate from '@/layouts/engineer/app-sidebar-layout';
import type { BreadcrumbItem } from '@/types';

export default function EngineerLayout({
    breadcrumbs = [],
    children,
}: {
    breadcrumbs?: BreadcrumbItem[];
    children: React.ReactNode;
}) {
    return (
        <AppLayoutTemplate breadcrumbs={breadcrumbs}>
            {children}
        </AppLayoutTemplate>
    );
}
