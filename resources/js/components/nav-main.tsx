import * as React from 'react';
import { Link } from '@inertiajs/react';
import {
    SidebarGroup,
    SidebarGroupLabel,
    SidebarMenu,
    SidebarMenuButton,
    SidebarMenuItem,
} from '@/components/ui/sidebar';
import { useState } from 'react';
import {
    BookOpen,
    FolderGit2,
    LayoutGrid,
    Castle,
    Cat,
    EyeClosed,
    Eye,
} from 'lucide-react';
import { useCurrentUrl } from '@/hooks/use-current-url';
import type { NavItem } from '@/types';

export function NavMain({ items = [] }: { items: NavItem[] }) {
    const { isCurrentUrl } = useCurrentUrl();
    return (
        <SidebarGroup className="px-2 py-0">
            <SidebarGroupLabel>Platform</SidebarGroupLabel>
            <SidebarMenu>
                {items.map((item) => (
                    <SidebarMenuItem key={item.title}>
                        {item.navItem ? (
                            <NestedNavMain
                                items={item.navItem}
                                title={item.title}
                            />
                        ) : (
                            <SidebarMenuButton
                                asChild
                                isActive={isCurrentUrl(item.href)}
                                tooltip={{ children: item.title }}
                            >
                                <Link href={item.href} prefetch>
                                    {item.icon && <item.icon />}
                                    <span>{item.title} </span>
                                </Link>
                            </SidebarMenuButton>
                        )}
                    </SidebarMenuItem>
                ))}
            </SidebarMenu>
        </SidebarGroup>
    );
}

function NestedNavMain({
    items = [],
    title,
}: {
    items: NavItem[];
    title: string;
}) {
    const { isCurrentUrl } = useCurrentUrl();
    const [toggle, setToggle] = useState<boolean>(true);

    return (
        <SidebarGroup className="my-2 border-t-2 border-b-2 px-2 py-1">
            <ToggleBar title={title} toggle={toggle} setToggle={setToggle} />
            <SidebarMenu className={toggle ? 'hidden' : 'my-3 block'}>
                {items.map((item) => (
                    <SidebarMenuItem key={item.title}>
                        <SidebarMenuButton
                            asChild
                            isActive={isCurrentUrl(item.href)}
                            tooltip={{ children: item.title }}
                        >
                            <Link href={item.href} prefetch>
                                {item.icon && <item.icon />}
                                <span>{item.title} </span>
                            </Link>
                        </SidebarMenuButton>
                    </SidebarMenuItem>
                ))}
            </SidebarMenu>
        </SidebarGroup>
    );
}

type ColaspBar = {
    title: string;
    toggle: boolean;
    setToggle: React.Dispatch<React.SetStateAction<boolean>>;
};

function ToggleBar({ title, toggle, setToggle }: ColaspBar) {
    return (
        <>
            <SidebarGroupLabel className="pl-3">
                <button className="w-full" onClick={() => setToggle(!toggle)}>
                    <div className="my-2 flex justify-between text-sm">
                        <span className="flex justify-between gap-2 text-sm">
                            <LayoutGrid className="h-4" /> {title.toUpperCase()}
                        </span>
                        <span className="roundded bg-transparent text-white">
                            {toggle ? (
                                <EyeClosed className="h-4" />
                            ) : (
                                <Eye className="h-4" />
                            )}
                        </span>
                    </div>
                </button>
            </SidebarGroupLabel>
        </>
    );
}
