import AppLayoutTemplate from '@/layouts/customerservice/app-sidebar-layout';
import type { BreadcrumbItem } from '@/types';

export default function CustomerServiceLayout({
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
