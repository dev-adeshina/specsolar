import AppLayoutTemplate from '@/layouts/cashier/app-sidebar-layout';
import type { BreadcrumbItem } from '@/types';

export default function CashierLayout({
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
