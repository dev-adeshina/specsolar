import { createInertiaApp } from '@inertiajs/react';
import { Toaster } from '@/components/ui/sonner';
import { TooltipProvider } from '@/components/ui/tooltip';
import { initializeTheme } from '@/hooks/use-appearance';
import AppLayout from '@/layouts/app-layout';
import AuthLayout from '@/layouts/auth-layout';
import SettingsLayout from '@/layouts/settings/layout';
import CustomerServiceLayout from './layouts/customerservice-layout';
import CashierLayout from './layouts/cashier-layout';
import CustomerLayout from './layouts/customers-layout';
import EngineerLayout from './layouts/engineer-layout';
import AdminLayout from './layouts/admin-layout';
import AdminSettingsLayout from '@/layouts/adminsettings/layout';
import CashierSettingsLayout from './layouts/cashiersettings/layout';
import CustomerServiceSettingsLayout from './layouts/customerservicesettings/layout';
import EngineerSettingsLayout from './layouts/engineersettings/layout';
import CustomersSettingsLayout from './layouts/customersettings/layout';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => (title ? `${title} - ${appName}` : appName),
    layout: (name) => {
        switch (true) {
            case name === 'welcome':
                return null;
            case name.startsWith('auth/'):
                return AuthLayout;
            case name.startsWith('settings/'):
                return [AppLayout, SettingsLayout];
            case name.startsWith('admin/'):
                return AdminLayout;
            case name.startsWith('adminsettings/'):
                return [AdminLayout, AdminSettingsLayout];
            case name.startsWith('engineer/'):
                return EngineerLayout;
            case name.startsWith('engineersettings/'):
                return [EngineerLayout, EngineerSettingsLayout];
            case name.startsWith('customers/'):
                return CustomerLayout;
            case name.startsWith('customerssettings/'):
                return [CustomerLayout, CustomersSettingsLayout];
            case name.startsWith('customerservice/'):
                return CustomerServiceLayout;
            case name.startsWith('customerservicesettings/'):
                return [CustomerServiceLayout, CustomerServiceSettingsLayout];
            case name.startsWith('cashier/'):
                return CashierLayout;
            case name.startsWith('cashiersettings/'):
                return [CashierLayout, CashierSettingsLayout];
            default:
                return AppLayout;
        }
    },
    strictMode: true,
    withApp(app) {
        return (
            <TooltipProvider delayDuration={0}>
                {app}
                <Toaster />
            </TooltipProvider>
        );
    },
    progress: {
        color: '#4B5563',
    },
});

// This will set light / dark mode on load...
initializeTheme();
