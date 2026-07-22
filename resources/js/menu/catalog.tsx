import type { NavItem } from '@/types';
import { attribute, attributeGroup, brands, categories, product, productType, productTypeAttribute, productVariant, tag, warehouse } from '@/routes/catalog';
import { BookOpen, FolderGit2, LayoutGrid } from 'lucide-react';


const catalogMenu: NavItem[] = [
    {
        title: 'Categories',
        href: categories(),
        icon: LayoutGrid,
    },
    {
        title: 'Brands',
        href: brands(),
        icon: LayoutGrid,
    },
    {
        title: 'Product Types',
        href: productType(),
        icon: LayoutGrid,
    },
    {
        title: 'Attribute Group',
        href: attributeGroup(),
        icon: LayoutGrid,
    },
    {
        title: 'Atrribute',
        href: attribute(),
        icon: LayoutGrid,
    },
    {
        title: 'Product Type Attribute',
        href: productTypeAttribute(),
        icon: LayoutGrid,
    },
    {
        title: 'Tag',
        href: tag(),
        icon: LayoutGrid,
    },
    {
        title: 'Warehouse',
        href: warehouse(),
        icon: LayoutGrid,
    },
    {
        title: 'Products',
        href: product(),
        icon: LayoutGrid,
    },
    
    {
        title: 'Product Varaint',
        href: productVariant(),
        icon: LayoutGrid,
    },
];

export default catalogMenu;