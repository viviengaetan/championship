import Link from 'next/link'

export default function NotFound() {
    return (
        <main className="flex min-h-screen flex-col items-center justify-between p-24">
            <div>
                <h2>Not Found</h2>
                <p>Could not find requested stadium</p>
                <Link href="/stadium/list">Return Home</Link>
            </div>
        </main>
    )
}