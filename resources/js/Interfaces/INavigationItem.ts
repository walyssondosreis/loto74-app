
export interface INavigationItem {
    name: string;
    href: string;
    current: boolean;
    subitems?: INavigationItem[];
}
