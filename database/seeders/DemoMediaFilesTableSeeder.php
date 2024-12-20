<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\MediaFile;

class DemoMediaFilesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//
		$admin = User::find(1);
		$editor = User::find(2);
		$author = User::find(3);

		$file1 = new MediaFile([
			'title' => 'File One',
			'excerpt' => 'This is file one',
			'path' => 'file1.docx',
			'icon' => 'word',
			'publish_on' => now(),
		]);

		$file2 = new MediaFile([
			'title' => 'File Two',
			'excerpt' => 'This is file two',
			'path' => 'file2.docx',
			'icon' => 'word',
			'publish_on' => now(),
		]);

		$file3 = new MediaFile([
			'title' => 'File Three',
			'excerpt' => 'This is file three',
			'path' => 'file3.pdf',
			'icon' => 'pdf',
			'publish_on' => now(),
		]);

		$file4 = new MediaFile([
			'title' => 'File Four',
			'excerpt' => 'This is file four',
			'path' => 'file4.xlsx',
			'icon' => 'excel',
			'publish_on' => now(),
		]);

		$file5 = new MediaFile([
			'title' => 'File Five',
			'excerpt' => 'This is file five',
			'path' => 'file5.pdf',
			'icon' => 'pdf',
			'publish_on' => now(),
		]);

		$file6 = new MediaFile([
			'title' => 'File Six',
			'excerpt' => 'This is file six',
			'path' => 'file6.xlsx',
			'icon' => 'excel',
			'publish_on' => now(),
		]);

		$admin->files()->saveMany([
			$file1,
			$file2,
			$file3,
		]);


		$editor->files()->saveMany([
			$file4,
			$file5,
		]);

		$author->files()->saveMany([
			$file6,
		]);
	}
}
