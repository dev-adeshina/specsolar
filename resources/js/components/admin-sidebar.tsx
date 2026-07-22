import { Link } from '@inertiajs/react';
import { BookOpen, FolderGit2, LayoutGrid } from 'lucide-react';
import AppLogo from '@/components/app-logo';
import { NavFooter } from '@/components/nav-footer';
import { NavMain } from '@/components/nav-main';
import { NavUser } from '@/components/nav-user';
import {
    Sidebar,
    SidebarContent,
    SidebarFooter,
    SidebarHeader,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { admin_dashboard } from '@/routes';
import { index as staff } from '@/routes/staff';
import type { NavItem } from '@/types';
import { AdminNavUser } from './admin-nav-user';
import { categories } from '@/routes/catalog';
import  catalogMenu  from '@/menu/catalog';



const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        href: admin_dashboard(),
        icon: LayoutGrid,
    },
    {
        title: 'Staffs',
        href: staff(),
        icon: LayoutGrid,

    },
    {
        title: 'Catalog',
        href: categories(),
        icon: LayoutGrid,
        navItem: catalogMenu
    },
    {
        title: 'Order',
        href: staff(),
        icon: LayoutGrid,
       
    },
    {
        title: 'Inventory',
        href: staff(),
        icon: LayoutGrid,
    },
    {
        title: 'Sales',
        href: staff(),
        icon: LayoutGrid,
    },
    {
        title: 'Delivery',
        href: staff(),
        icon: LayoutGrid,
    },
];

 




export function AppSidebar() {
    return (
        <Sidebar collapsible="icon" variant="inset">
            <SidebarHeader>
                <SidebarMenu>
                    <SidebarMenuItem>
                        <SidebarMenuButton size="lg" asChild>
                            <Link href={admin_dashboard()} prefetch>
                                <AppLogo />
                            </Link>
                            
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                </SidebarMenu>
            </SidebarHeader>

            <SidebarContent>
                <NavMain items={mainNavItems} />
            </SidebarContent>

            <SidebarFooter>
                <AdminNavUser />
            </SidebarFooter>
        </Sidebar>
    );
}
