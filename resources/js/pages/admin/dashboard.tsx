import { Head, Link } from '@inertiajs/react';
import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import { admin_dashboard } from '@/routes';
import { index as staff } from '@/routes/staff';
import { UserPlus } from 'lucide-react';
import { Card } from '@/components/ui/card';
import { Button } from '@/components/ui/button';



export default function AdminDashboard() {
    return (
        <>
            <Head title="Admin" />
            <div className="flex h-full flex-1 flex-col gap-4 overflow-x-auto rounded-xl p-4">
                <div className="grid auto-rows-min gap-4 md:grid-cols-3">
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <Card className="group cursor-pointer my-6 mx-6 p-6 transition-all hover:-translate-y-1">
                            <div className="flex justify-between w-full items-center">
                                <UserPlus className="mb-4 h-10 w-10 text-primary" />
                                <div className="w-40">
                                    <h1 className="text-2xl font-semibold">Employ Staff</h1>
                                    <p className="mt-2 text-sm text-muted-foreground">
                                        Register engineers, cashiers, administrators, and customer service staff.
                                    </p>
                                </div>
                                <Button className="w-60">
                                    <Link href={staff()} prefetch>
                                        Register
                                    </Link>
                                </Button> 
                            </div>
                        </Card>
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                    <div className="relative aspect-video overflow-hidden rounded-xl border border-sidebar-border/70 dark:border-sidebar-border">
                        <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                    </div>
                </div>
                <div className="relative min-h-[100vh] flex-1 overflow-hidden rounded-xl border border-sidebar-border/70 md:min-h-min dark:border-sidebar-border">
                    <PlaceholderPattern className="absolute inset-0 size-full stroke-neutral-900/20 dark:stroke-neutral-100/20" />
                </div>
            </div>
        </>
    );
}

AdminDashboard.layout = {
    breadcrumbs: [
        {
            title: 'Admin',
            href: admin_dashboard(),
        },
        
    ],
};
