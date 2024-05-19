import Link from 'next/link'

export default function NotFound() {
    return (
        <main className="flex min-h-screen flex-col items-center justify-between p-24">
            <div>
                <h2>Not Found</h2>
                <p>Could not find requested team</p>
                <Link href={"/team/list"}>Return to the team list</Link>
            </div>
        </main>
    )
}